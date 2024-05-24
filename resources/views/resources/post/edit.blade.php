<x-app-layout>
    <div class="pagetitle">
        <h1>{{ __('Edit Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{ __('Resources') }}</li>
                <li class="breadcrumb-item"><a href="{{ route('post.index') }}">{{ __('Posts') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Edit Post') }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title">{{ __('Edit Post') }}</h5>
                            <a href="{{ route('post.index') }}" type="button" class="btn btn-primary">Go Back</a>
                        </div>
                        <form action="{{ route('post.update', $post) }}" method="post">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $post->id }}">

                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="Subject" value="{{ $post->subject }}"/>
                                    <label for="subject">Subject</label>
                                    @error('subject')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control @error('post') is-invalid @enderror" name="post" id="post" placeholder="Post" style="height: 100px">{{ $post->post }}</textarea>
                                    <label for="post">Post</label>
                                    @error('post')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" {{ ($post->status == 1 ? 'checked' : '') }}>
                                    <label class="form-check-label" for="status">Post Status</label>
                                </div>
                                <div class="w-100 mt-4">
                                    <button type="submit" class="btn btn-primary">Update Post</button
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>