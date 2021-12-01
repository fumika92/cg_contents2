new Vue({
  el: '#app_user_about',
  data: {
    isActive: '1'
  },
  methods: {
    change: function(num){
      this.isActive = num
    }
  }
})