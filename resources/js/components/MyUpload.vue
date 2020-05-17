<template>
  <div id="ppic">
    <div class="image" v-bind:style="{ backgroundImage: 'url(/uploads/' + current + ')' }"></div>
    <form
      id="ppic_form"
      :action="action"
      method="POST"
      enctype="multipart/form-data"
      class="text-center">
      <slot></slot>
      <button v-on:click.prevent="upload">
        <i class="fas fa-edit"></i>
      </button>
      <input type="file" id="ppic_upload" name="ppic" style="display: none;">
    </form>
  </div>
</template>

<style lang="scss" scoped>
#ppic {
  margin: 25px 0;
}
.image {
  width: 130px;
  height: 130px;
  border-radius: 100%;
  margin: auto;
  background-size: cover;
}
p {
  color: #1c7187;
}
button {
  background: transparent;
  color: white;
  float: right;
  border: 0;
  border-radius: 5px;
  font-size: 12px;
  i {
    padding-right: 7px;
  }
}
</style>


<script>
export default {
  props: ["current", "action"],
  methods: {
    upload: function() {
      document.getElementById("ppic_upload").onchange = function() {
        document.getElementById("ppic_form").submit();
      };
      $("input[id='ppic_upload']").click();
    }
  }
};
</script>
