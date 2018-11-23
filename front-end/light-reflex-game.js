const keyCodes = {
  SPACE: 32
}

new Vue({
  el: "#game",
  data: {
    lightCount: 24,
    intervalLength: 45, //ms
    playing: false,
    lights: [],
    lit: 0,
    interval: null,
    score: 0,
    tries: 10,
    messages: {
      controls: 'Hit Space to Start and Stop',
      endGame: '',
      scoreText: "0",
      triesLeft: 10
    } 
  },
  
  methods: {
    setBroadcasters () {
      let vm = this
      // add global keydown event listener
      window.addEventListener('keydown', function(event) { 
        vm.$emit('keydown', event.keyCode)
      })
    },
    setListeners () {
      let vm = this
      
      // listen to keydown events
      vm.$on('keydown', (keyCode) => {
         if (keyCode === keyCodes.SPACE) {
           vm.handleKeySpace()
         }
      })
    },
    incrementLit() {
      // cyclically increment through lights, modulo wraps to 0
      this.lit = (this.lit + 1) % this.lights.length
    },
    
    handleKeySpace() {
      if (!this.interval) {
        // reset the lit light to the start
        this.lit = 0
        // set interval to light next light
        this.interval = setInterval(this.incrementLit, this.intervalLength)
        // clear the end game message
        this.messages.endGame = ''
      } else {
        // stop and clear the interval
        clearInterval(this.interval)
        this.interval = null
        //score
        if(this.lit === 0)
          this.score++;
        this.messages.scoreText = this.score.toString();

        this.tries--;
        this.messages.triesLeft = this.tries;
        
        // set the end game message 
        if(this.tries === 0){
          this.messages.endGame = "End of game. " + "Your score is: " + this.messages.scoreText;
          confirmBox = confirm("Game ended");
          if(confirmBox == true){
            console.log("Okay clicked");
        
            //using ajax to save score in database
              $.ajax({
                url: "save-reflex-score.php",
                type: "post",
                data: { data: this.score },
                success: function (data) {
                  console.log(data);
                }
              });

            this.tries = 10;
            this.score = 0;
          }
          else
            console.log("Cancel clicked");
        }
      }
    }
  },
  
  mounted () {
    let vm = this
    vm.setBroadcasters()
    vm.setListeners()
    
    // Create an array of light objects for use with v-for
    for (let i = 0; i < this.lightCount; i++) {
      this.lights.push({
        key: i,
      })
    }
  }
})