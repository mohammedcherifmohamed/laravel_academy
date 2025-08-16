@extends('Layout.Main') 

@section('title')
    register Page    
@endsection

@section('content')

<section class="bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen flex items-center justify-center p-4">
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
    <div class="absolute top-40 left-40 w-80 h-80 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
  </div>

  <div class="relative w-full max-w-md">
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mb-4 shadow-lg">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75"/>
        </svg>
      </div>
    </div>
    @if(session('db_error'))
        <x-alert type="warning" >
            {{session('db_error')}}
        </x-alert>
    @endif
    <div id="registerForm" class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
      <form action="{{route('register.post')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf


        <div>
          <label for="Name" class="block text-sm font-medium text-gray-700 mb-2">
            Name <span class="text-red-500">*</span>
          </label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
            </div>
            <input
              type="text"
              id="Name"
              name="name"
              required
              class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
              placeholder="Enter your username"
              value="{{old('Name')}}"
            />
            @error('Name')
                <span class="text-red-800">
                    {{$message}}
                </span>
            @enderror
          </div>
        </div>
        <div>
          <label for="FamillyName" class="block text-sm font-medium text-gray-700 mb-2">
            Familly Name <span class="text-red-500">*</span>
          </label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
            </div>
            <input
              type="text"
              id="FamillyName"
              name="FamillyName"
              required
              class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
              placeholder="Choose a FamillyName"
              value="{{old('FamillyName')}}"
            />
                @error('FamillyName')
            <span class="text-red-800">
                {{$message}}
            </span>
        @enderror
          </div>
        </div>

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
              value="{{old('email')}}"
            />
                @error('email')
            <span class="text-red-800">
                {{$message}}
            </span>
        @enderror
          </div>
        </div>
        {{-- i need gender drop down --}}
        <div class="flex column">

          <label for="gender">Gender</label>
          <select name="gender" id="gender" class="" >
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        
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
              class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
              placeholder="Create a strong password"
              value="{{old('password')}}"
            />
            <button
              type="button"
              class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
            >
              <svg id="passwordIcon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.274.832-.67 1.613-1.17 2.318M15.232 15.232A3 3 0 0112 17a3 3 0 01-3-3"/>
              </svg>
            </button>
          </div>
          <div class="mt-2 text-xs text-gray-500">
            Must be at least 8 characters with uppercase, lowercase, and number
          </div>
              @error('password')
            <span class="text-red-800">
                {{$message}}
            </span>
        @enderror
        </div>

        <div>
          <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-2">
            Confirm Password <span class="text-red-500">*</span>
          </label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
              </svg>
            </div>
            <input
              type="password"
              id="confirmPassword"
              name="password_confirmation"
              required
              class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
              placeholder="Confirm your password"
            />
            <button
              type="button"
              class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
            >
              <svg id="confirmPasswordIcon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.274.832-.67 1.613-1.17 2.318M15.232 15.232A3 3 0 0112 17a3 3 0 01-3-3"/>
              </svg>
            </button>
          </div>
              @error('password')
            <span class="text-red-800">
                {{$message}}
            </span>
        @enderror
        </div>


        <button
          type="submit"
          id="submitBtn"
          class="w-full bg-blue-500 text-white py-3 px-4 rounded-lg font-medium hover:from-blue-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 transform hover:scale-105 shadow-lg"
        >
          Create Account
        </button>
      </form>

      <div class="text-center mt-6">
        <p class="text-gray-600">
          Already have an account? 
          <a href="{{route('login.load')}}" class="text-blue-600 hover:text-blue-500 font-medium">Sign in</a>
        </p>
      </div>
    </div>

    <!-- Success Message -->
    <div id="successMessage" class="hidden bg-white rounded-2xl shadow-xl p-8 border border-gray-100 text-center">
      <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
      </div>
      <h2 class="text-2xl font-bold text-gray-900 mb-2">Account Created!</h2>
      <p class="text-gray-600 mb-4">Welcome to SocialApp! Redirecting you to the login page...</p>
      <div class="flex justify-center">
        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
      </div>
    </div>
  </div>

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