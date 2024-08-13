<!-- resources/views/frontend/contact/index.blade.php -->

@extends('layouts.frontend.app')

@section('content')
 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="breadcrumb__links">
                     <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                     <span>Kontak</span>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Breadcrumb End -->
 <section>
     <div class="container">
         <h1>Kontak Kami</h1>
         <form action="{{ route('contact.send') }}" method="POST">
             @csrf
             <div class="form-group">
                 <label for="name">Nama:</label>
                 <input type="text" class="form-control" id="name" name="name" required>
             </div>
             <div class="form-group">
                 <label for="email">Email:</label>
                 <input type="email" class="form-control" id="email" name="email" required>
             </div>
             <div class="form-group">
                 <label for="message">Pesan:</label>
                 <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
             </div>
             <button type="submit" class="btn btn-primary">Kirim</button>
         </form>
     </div>
 </section>
@endsection
