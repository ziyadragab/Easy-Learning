<?php

namespace App\Http\Repositories\Admin;


use App\Http\Interfaces\Admin\PortfolioInterface;
use App\Http\Traits\ImagesTrait;
use App\Models\Portfolio;

class PortfolioRepository implements PortfolioInterface
{

    use ImagesTrait;

    private $portfolioModel;
    public function __construct(Portfolio $portfolio)
    {
        $this->portfolioModel = $portfolio;
    }
    public function index($dataTable)
    {
        return $dataTable->render('admin.pages.portfolio.index');
    }
    public function create()
    {
        return view('admin.pages.portfolio.create');
    }
    public function store($request)
    {
        $imageName = $this->uploadImage($request->file('image'), $this->portfolioModel::PATH);

        $this->portfolioModel::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'image' => $imageName,
        ]);

        toast('Portfolio Created Successfully', 'success');
        return redirect(route('admin.portfolio.index'));
    }
    public function edit($portfolio)
    {
        return view('admin.pages.portfolio.edit', compact('portfolio'));
    }
    public function update($portfolio, $request)
    {
        if ($request->image) {
            $newImage = $this->uploadImage($request->image, $this->portfolioModel::PATH, $portfolio->image);
        }
        $portfolio->update([
            'title' =>
            [
                'en' => $request->title_en,
                'ar' => $request->title_ar
            ],
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'image' => $newImage ?? $portfolio->getRawOriginal('image')
        ]);
        toast('portfolio Updated Successfully', 'success');
        return redirect(route('admin.portfolio.index'));
    }
    public function delete($portfolio)
    {

        $this->removeImage($portfolio->image);
        $portfolio->delete();
        toast('Portfolio Deleted Successfully', 'success');
        return redirect(route('admin.portfolio.index'));
    }
}
