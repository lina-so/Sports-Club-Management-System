  {{-- <div class="modal" id="modaldemo6{{ $post->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> Delete post</h6><button aria-label="Close"
                    class="close" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('post.destroy', $post->id) }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="form-group">

                    <x-form.input name="id" type="hidden" :value="$post->id"/>

                </div>

                <div class="modal-body">
                    <p>? Are you sure you want to delete this post</p><br>
                    <br>
                    <x-form.input name="title" type="text" :value="$post->title"/>
                    : post Title
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">cancel</button>
                    <button type="submit" class="btn btn-danger">save</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
