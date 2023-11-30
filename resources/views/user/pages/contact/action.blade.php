<style>
    #delete-form {
        display: inline;
    }

    .delete {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 4px;
        display: flex;
        align-items: center;
    }

    .delete svg {
        fill: #fff; /* Set the fill color for the SVG icon */
        margin-right: 8px; /* Add some spacing between the icon and text */
    }
</style>

<form id="delete-form" action="{{ route('admin.contact.delete', $contact) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="delete dropdown-item">
        <!-- Modern SVG icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        {{ __('messages.delete') }}
    </button>
</form>
