@extends('admin.layouts.app')
@section('title', 'Create blog')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="header-title mb-0">Create New blog</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger border-0 alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Error!</strong> Please fix the following issues:
                        <ul class="mt-2 mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form name="Createblog" id="Createblog" method="POST" enctype="multipart/form-data" action="{{ route('admin.blog.store') }}">
                    @csrf
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="card mb-3 border-primary">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">blog Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">blog Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter blog name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="slug" class="form-label">URL Slug <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">{{ url('/') }}/</span>
                                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}" placeholder="blog-slug" required>
                                        </div>
                                        <div id="slug-message" class="form-text"></div>
                                    </div>

                                                                  </div>
                            </div>

                            <div class="card border-primary">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">SEO Settings</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Meta Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Meta title for SEO">
                                    </div>

                                    <div class="mb-3">
                                        <label for="meta_keyword" class="form-label">Meta Keywords <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="{{ old('meta_keyword') }}" placeholder="keyword1, keyword2, keyword3">
                                        <div class="form-text">Separate keywords with commas</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" class="form-control" rows="2" placeholder="Meta description for SEO">{{ old('meta_description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="card mb-3 border-primary">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">blog Settings</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Status <span class="text-danger">*</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="enable" value="1" checked>
                                                <label class="form-check-label text-success" for="enable">
                                                    <i class="mdi mdi-check-circle-outline"></i> Enable
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="disable" value="0">
                                                <label class="form-check-label text-danger" for="disable">
                                                    <i class="mdi mdi-close-circle-outline"></i> Disable
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Featured blog <span class="text-danger">*</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="top_blog" id="not_top_blog" value="0" checked>
                                                <label class="form-check-label" for="not_top_blog">
                                                    Regular
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="top_blog" id="top_blog" value="1">
                                                <label class="form-check-label text-warning" for="top_blog">
                                                    <i class="mdi mdi-star-outline"></i> Featured
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                                        <select name="category_id" id="category_id" class="form-select" required>
                                            <option value="" disabled selected>-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" data-language="{{ $category->language_id ?? '' }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="language_id" class="form-label">Language <span class="text-danger">*</span></label>
                                        <select name="language_id" id="language_id" class="form-select" required>
                                            <option value="" disabled selected>-- Select Language --</option>
                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}" {{ old('language_id') == $language->id ? 'selected' : '' }}>
                                                    {{ $language->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                         <div class="mb-3">
                                        <label for="store_id" class="form-label">add in store <span class="text-danger">*</span></label>
                                        <select name="store_id" id="store_id" class="form-select" required>
                                            <option value="" disabled selected>-- Select store --</option>
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}" {{ old('store_id') == $store->id ? 'selected' : '' }}>
                                                    {{ $store->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">blog Logo <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
                                        <div class="form-text">Recommended size: 300x300 pixels</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Full Width Content Editor -->
                    <div class="card border-primary">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">blog Content</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <textarea id="editor" name="content" >{{ old('content') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-3 text-center">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="mdi mdi-content-save"></i> Save blog
                        </button>
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-danger px-4 ms-2">
                            <i class="mdi mdi-close-circle"></i> Cancel
                        </a>
                        <button type="reset" class="btn btn-light px-4 ms-2">
                            <i class="mdi mdi-autorenew"></i> Reset
                        </button>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

<script>
        document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category_id');
        const languageSelect = document.getElementById('language_id');

        categorySelect.addEventListener('change', function() {
            const selectedOption = categorySelect.options[categorySelect.selectedIndex];
            const languageId = selectedOption.getAttribute('data-language');
            if (languageId) {
                for (let i = 0; i < languageSelect.options.length; i++) {
                    if (languageSelect.options[i].value == languageId) {
                        languageSelect.selectedIndex = i;
                        break;
                    }
                }
            }
        });
    });
    // Auto-generate slug and website URL from name while typing
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value.trim();
        const slugField = document.getElementById('slug');
        const urlField = document.getElementById('url');

        if (name) {
            // Generate slug from name
            const generatedSlug = name.toLowerCase()
                .replace(/[^\w\s-]/g, '')  // Remove special chars
                .replace(/\s+/g, ' ')      // Replace spaces with -
                .replace(/--+/g, ' ');     // Replace multiple - with single -

            // Generate website URL (basic version)
            const currentUrl = window.location.origin;
            const generatedUrl = currentUrl + '/blog/' + generatedSlug;

            // Only update slug if the slug field is empty or matches the previously generated slug
            if (!slugField.value || slugField.value === slugField.dataset.previousGenerated) {
                slugField.value = generatedSlug;
                slugField.dataset.previousGenerated = generatedSlug;
                checkSlugUniqueness(generatedSlug);
            }

            // Only update URL if the URL field is empty or matches the previously generated URL
            if (!urlField.value || urlField.value === urlField.dataset.previousGenerated) {
                urlField.value = generatedUrl;
                urlField.dataset.previousGenerated = generatedUrl;
            }
        }
    });

    // Check slug when user leaves the name field
    document.getElementById('name').addEventListener('blur', function() {
        const slugField = document.getElementById('slug');
        const urlField = document.getElementById('url');

        if (slugField.value) {
            checkSlugUniqueness(slugField.value);
        }
    });

    // Function to check slug uniqueness
    function checkSlugUniqueness(slug) {
        const slugMessage = document.getElementById('slug-message');
        if (slug.length < 3) {
            slugMessage.textContent = 'Slug is too short';
            slugMessage.style.color = 'red';
        } else {
            slugMessage.textContent = 'Slug looks good!';
            slugMessage.style.color = 'green';
        }
    }

    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#editor'), {
            // Editor configuration
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection


