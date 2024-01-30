<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    @vite(['resources/css/main.css'])
    

      <div id="sidebar" class="sidebar-menu">
          @auth
              @include('layouts.sidebar')
          @endauth
      </div>
    </div>
      
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-lg-6">
              <h1 class="m-0">{{ $greeting }}, {{ Auth::user()->name }}</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <h5 class="card-header">Voorraad artikelen</h5>
                <div class="card-body p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                      <tr>
                          <th>Naam</th>
                          <th>Voorraad</th>
                          <th>Minimale voorraad</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($lowStockProducts as $product)
                          <tr>
                              <td>{{ $product->Naam }}</td>
                              <td style="color: red;">{{ $product->Voorraad }}</td>
                              <td style="color: green;">{{ $product->Minimale_voorraad }}</td>
                          </tr>
                      @endforeach
                  </tbody>
                  </table>
                </div>
              </div>
              <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</x-app-layout>
