<template>
  <div class="container">
    <div class="cv-confirm text-center" v-bind:class="{'hidden':!submitted}">
    <p>Successfully uploaded!</p>
    </div>
    <div class="cv-form" v-bind:class="{'hidden':submitted}">
      <label>
        <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
      </label>
        <button v-on:click="submitFile()">
          <i class="fas fa-circle-notch fa-spin" v-if="processing"></i>Submit</button>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.hidden {
  max-height: 0 !important;
}

i.fa-spin {
  float: right;
  margin-top: 5px;
}

.cv-confirm,
.cv-form {
  max-height: 1000px;
  -webkit-transition: max-height 0.8s;
  -moz-transition: max-height 0.8s;
  transition: max-height 0.8s;
  overflow: hidden;
}
button {
background-color: #3069ab;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 18px;
  i {
    padding-right: 7px;
  }
}

</style>


<script>

import axios from "axios";
export default {
  props: ["action"],
  data(){
    return {
       file: '',
       submitted: 0,
       processing: 0,
    }
  },
  methods: {
      handleFileUpload(){
        this.file = this.$refs.file.files[0];
      },
    submitFile(){

      this.processing = 1;
      let formData = new FormData();
      formData.append('file', this.file);

      axios
        .post("/upload/cv", formData,
        {
            headers: {
            'Content-Type': 'multipart/form-data'
            }
        })
        .then(response => {

          console.log(response);
          this.saved_user = response.data;
          this.submitted = 1;
          this.processing = 0;
        })
        .catch(error => {
          this.processing = 0;
          if (error.response.status == 400) {
            this.errors = error.response.data;
            return;
          }
          console.log(error);
          console.log(error.response.status);
          console.log(error.response.status);
          console.log(error.response.headers);
        });
    }      
   }
};
</script>
