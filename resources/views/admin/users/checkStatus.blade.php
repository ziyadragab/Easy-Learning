<a href="{{ route('admin.changeStatus',$user) }}" onclick="handleClick()" style="text-decoration: none; cursor: pointer;">
    <span style="color: {{ $user->status === 'active' ? 'green' : 'red' }}">
        {{ $user->status === 'active' ? 'Active' : 'Inactive' }}
    </span>
</a>


