<template>
 <div id="app">
     
    <ul>
        <li v-for="name in names">{{ name }}</li>
    </ul>
</div>

</template>

<script>
    export default {
      
      data: function() {
          return {
              names: ['joe', 'mary', 'jane', 'jack']
          }
      }
    }
    
</script>

<style scoped>

</style>