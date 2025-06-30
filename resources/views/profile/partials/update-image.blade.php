<section class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 transition-all duration-300 hover:shadow-xl max-w-2xl mx-auto">
    <form action="{{ route('profile.image.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <header class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                {{ __('Profile Picture') }}
            </h2>
            <p class="mt-2 text-gray-500">
                {{ __('Upload a new photo to personalize your profile.') }}
            </p>
        </header>

        <!-- Success Message -->
        @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded">
            <div class="flex items-center">
                <div class="flex-shrink-0 text-green-500">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700 font-medium">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
            <div class="flex items-center">
                <div class="flex-shrink-0 text-red-500">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-700">There were {{ $errors->count() }} errors with your submission</h3>
                    <div class="mt-2 text-sm text-red-600">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="flex flex-col items-center">
            <div class="relative mb-6">
                <div class="relative overflow-hidden rounded-full w-32 h-32 border-4 border-white shadow-lg">
                    <img
                        src="{{ asset('uploads/user/' . (Auth::user()->image ?? 'no-image.png')) }}"
                        alt="user-image"
                        class="w-full h-full object-fill"
                        onerror="this.onerror=null;this.src='{{ asset('assets/images/users/user-5.jpg') }}'"
                    >
                </div>
            </div>
        </div>

        <div class="space-y-6">
      

            <!-- File Upload Field (now visible) -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Profile Photo') }}
                </label>
                <div class="mt-1 flex items-center">
                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Choose file
                        </span>
                        <input
                            id="image"
                            name="image"
                            type="file"
                            accept="image/*"
                            class="sr-only"
                        >
                    </label>
                    <span class="ml-3 text-sm text-gray-500" id="file-name">
                        No file chosen
                    </span>
                </div>
                <p class="mt-1 text-xs text-gray-500">
                    PNG, JPG up to 5MB
                </p>
                @error('image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Instructions -->
            <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-indigo-800">Upload tips</h3>
                        <div class="mt-2 text-sm text-indigo-700">
                            <p>• Use a high-quality image (JPG, PNG)</p>
                            <p>• Square images work best</p>
                            <p>• Max file size: 5MB</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center pt-4">
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-medium rounded-lg shadow-md hover:from-indigo-700 hover:to-indigo-800 transition transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                {{ __('Save Changes') }}
            </button>
        </div>
    </form>
</section>

<script>
    // Show selected filename
    document.getElementById('image').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
        document.getElementById('file-name').textContent = fileName;
    });
</script>
