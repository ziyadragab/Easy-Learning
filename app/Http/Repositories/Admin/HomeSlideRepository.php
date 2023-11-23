<?php
namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\HomeSlideInterface;
use App\Http\Traits\ImagesTrait;
use App\Models\HomeSlide;

class HomeSlideRepository implements HomeSlideInterface{

    use ImagesTrait;

    private $homeSlideModel;
    public function __construct(HomeSlide $homeSlide)
    {
     $this->homeSlideModel=$homeSlide;
    }
    public function index($dataTable)
    {
       return $dataTable->render('admin.pages.slide.index');
    }
    public function create()
    {
       return view('admin.pages.slide.create');
    }
    public function store($request)
    {
        $imageName = $this->uploadImage($request->file('image'), $this->homeSlideModel::PATH);

        $this->homeSlideModel::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'description' => $request->description,
            'image' => $imageName,
            'video' => $request->video,
        ]);

        toast('Slide Created Successfully', 'success');
        return redirect(route('admin.slide.index'));

    }
    public function edit($slide)
    {
      return view('admin.pages.slide.edit',compact('slide')); 
    }
    public function update($slide, $request)
    {
      if($request->image){
       $newImage= $this->uploadImage($request->image,$this->homeSlideModel::PATH , $slide->getRawOriginal('image'));
      }
      $slide->update([
      'title'=>
      [
        'en'=>$request->title_en,
        'ar'=>$request->title_ar
      ],
      'description'=>$request->description,
      'video'=>$request->video,
      'image'=>$newImage ??$slide->getRawOriginal('image')
      ]);
      toast('Slide Updated Successfully','success');
      return redirect(route('admin.slide.index'));
    }
    public function delete($slide)
    {
       
      $this->removeImage($slide->image);
      $slide->delete();
      toast('Slide Deleted Successfully','success');
      return redirect(route('admin.slide.index'));
    } 
}






?>
