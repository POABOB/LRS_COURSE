<template>
  <div>
    <header class="bg-white shadow text-center">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">{{ course_name }}</h1>
      </div>
    </header>
    <main class="h-screen pb-16 overflow-y-auto bg-gray-50">
      <div class="container grid pt-6 px-6 max-w-5xl mx-auto">

      </div>
    </main>
  </div>
</template>

<script>
  export default {
    name: 'Home',
    setup() {
      const course_name = '課程B'

      return { course_name }
    }
  }
</script>