<x-app-layout>
  @vite(['resources/css/main.css'])
    

  <div id="sidebar" class="sidebar-menu">
      @auth
          @include('layouts.sidebar')
      @endauth
  </div>
</div>
    <div class="content-wrapper">
      <livewire:display-materials-table wire:poll.5s/>
    </div>
</x-app-layout>
