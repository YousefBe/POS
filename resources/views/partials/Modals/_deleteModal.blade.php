<div class="modal fade" id="DeleteModal">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Confirm Delete
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(Request::path() == 'client')
                Clients Are the Assets of our app, are u sure u want to delete this client ?
                @elseif(Request::path() == 'order')
                Are U sure You Want to delete this order ?
                @elseif(Request::path() =='user')
                Are U sure You Want to delete this User ?
                @elseif(Request::path() == 'order')
                Are U sure You Want to delete this order ?
                @elseif(Request::path() == 'category')
                Deleting This categroy will delete all of its products , are u sure u still wana delete it ?
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                <form action="" method="POST" style="display: inline-block" id="deleteForm">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>