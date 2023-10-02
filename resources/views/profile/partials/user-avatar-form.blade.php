<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Avatar Information
        </h2>

        <img width="50" height="50" class="rounded-full" src="{{ "/storage/$user->Avatar" }}" alt="User Avatar">

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Add or Update User Avatar
        </p>
    </header>

    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    

    
        <div class="mt-4">
            <x-input-label for="name" :value="__('Avatar')" />
            <x-text-input id="Avatar" name="Avatar" type="file" class="mt-1 block w-full" :value="old('name', $user->name)"    autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('Avatar')" />
        </div>
        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
</div>

       
        
                
      
        
    </form>
</section>
