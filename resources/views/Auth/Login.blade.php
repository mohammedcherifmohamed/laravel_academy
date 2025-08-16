@extends('Layout.Main') 

@section('title')
    Login Page    
@endsection

@section('content')
<section>
<section class="bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen flex items-center justify-center p-4">

  <!-- Background decoration -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
    <div class="absolute top-40 left-40 w-80 h-80 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
  </div>

  <div class="relative w-full max-w-md">
    <!-- Logo and Header -->
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mb-4 shadow-lg">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75"/>
        </svg>
      </div>
      <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h1>
      <p class="text-gray-600">Sign in to your Academy</p>
    </div>
    @if(session('error_login'))
        <x-alert type="error" >

            {{session('error_login')}}

        </x-alert>
    @endif
    @if(session('register_success'))
    <x-alert type="success">
        {{ session('register_success') }}
    </x-alert>
@endif

    <!-- Login Form -->
    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
      <form action="{{route('login.post')}}" method="POST" class="space-y-6">
       @csrf
        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
            Email Address <span class="text-red-500">*</span>
          </label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
              </svg>
            </div>
            <input
              type="email"
              id="email"
              name="email"
              required
              class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
              placeholder="Enter your email"
            />
          </div>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
            Password <span class="text-red-500">*</span>
          </label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
              </svg>
            </div>
            <input
              type="password"
              id="password"
              name="password"
              required
              class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
              placeholder="Enter your password"
            />
          </div>
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input
              id="remember"
              name="remember"
              type="checkbox"
              class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
            />
            <label for="remember" class="ml-2 block text-sm text-gray-700">
              Remember me
            </label>
          </div>
          <div class="text-sm">
            <a href="#" class="text-blue-600 hover:text-blue-500 font-medium">
              Forgot password?
            </a>
          </div>
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          class="w-full bg-blue-500 text-white py-3 px-4 rounded-lg font-medium  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 transform hover:scale-105 shadow-lg"
        >
          Sign In
        </button>
      </form>

      

      <!-- Register Link -->
      <div class="text-center mt-6">
        <p class="text-gray-600">
          Don't have an account? 
          <a href="{{route('register.load')}}" class="text-blue-600 hover:text-blue-500 font-medium">Sign up</a>
        </p>
      </div>
    </div>
  </div>

  <!-- Custom CSS for animations -->
  <style>
    @keyframes blob {
      0% {
        transform: translate(0px, 0px) scale(1);
      }
      33% {
        transform: translate(30px, -50px) scale(1.1);
      }
      66% {
        transform: translate(-20px, 20px) scale(0.9);
      }
      100% {
        transform: translate(0px, 0px) scale(1);
      }
    }
    .animate-blob {
      animation: blob 7s infinite;
    }
    .animation-delay-2000 {
      animation-delay: 2s;
    }
    .animation-delay-4000 {
      animation-delay: 4s;
    }
  </style>
</section>

@endsection