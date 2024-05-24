<x-app-layout>
    <div class="pagetitle">
        <h1>{{ __('Posts') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{ __('Resources') }}</li>
                <li class="breadcrumb-item active">{{ __('Posts') }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('message'))
                    <div id="alert-message" class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                        setTimeout(function() {
                            const alertMessage = document.getElementById('alert-message');
                            if (alertMessage) {
                                alertMessage.classList.remove('show');
                                setTimeout(() => alertMessage.remove(), 150); // Adjust timing for fade effect
                            }
                        }, 3000);
                    </script>
                @endif
                <div class="card p-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title">{{ __('List of Posts') }}</h5>
                            <a href="{{ route('post.create') }}" type="button" class="btn btn-primary">Add New Post</a>
                        </div>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($posts)
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->subject }}</td>
                                            <td>{{ $post->post }}</td>
                                            <td>{!! $post->status == 1 ? '<small class="text-success">Published</small>' : '<small class="text-danger">Unpublished</small>' !!}</td>
                                            <td class="d-flex align-items-center gap-2">
                                                <a href="{{ route('post.show', $post) }}" class="btn btn-dark"><i class="bi bi-folder-symlink"></i></a>
                                                <a href="{{ route('post.edit', $post) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                                <form action="{{ route('post.destroy', $post) }}" method="post" class="d-inline" id="delete-form-{{ $post->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $post->id }})"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function confirmDelete(postId) {
                                                        if (confirm('Are you sure you want to delete this post?')) {
                                                            document.getElementById('delete-form-' + postId).submit();
                                                        }
                                                    }
                                                </script>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>