<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

      <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('-translate-x-full');
    }
    function openModal() {
      document.getElementById('addCourseModal').classList.remove('hidden');
    }
    function closeModal() {
      document.getElementById('addCourseModal').classList.add('hidden');
    }
  </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">


    @yield('content')





