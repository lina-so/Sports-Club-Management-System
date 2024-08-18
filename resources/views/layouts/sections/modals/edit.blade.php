   {{-- <div class="modal" id="modaldemo9{{ $post->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> Edit post</h6><button aria-label="Close"
                    class="close" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('post.update', $post->id) }}" method="POST"
                enctype="multipart/form-data">
                {{ method_field('patch') }}
                {{ csrf_field() }}

                <div class="modal-body">
                    <x-form.input name="user_id" type="hidden" />

                    <div class="form-group">
                        <x-form.input name="title" type="text" label="post title" :value="$post->title" />
                    </div>

                    <div class="form-group">
                        <x-form.textarea name="content" rows="5" :value="$post->content"
                            label="content"></x-form.textarea>
                    </div>

                    <div class="form-group">
                        <x-form.input name="image" type="file" label="post image" />
                    </div>

                    <div class="form-group">
                        <x-form.select
                        name="blogs"
                        :label="'Select Blogs'"
                        :options="$blogs->pluck('name', 'id')->toArray()"
                    />

                    </div>
                </div>


                <div class="modal-footer">
                    <button class="btn  btn-primary" type="submit">save</button>
                    <button class="btn  btn-secondary" data-dismiss="modal"
                        type="button">cancel</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
