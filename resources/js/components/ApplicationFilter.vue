<template>
<form :action="action" method="GET" id="applicationFilterForm">
    <div class="row justify-content-center application-filter">
        <label class="col-lg-1 col-md-1 col-sm-12 text-center text-white col-form-label label label-primary">Fiter</label>
      <div class="col-lg-2 col-md-2 col-sm-12 col-12 form-group">
        <select v-model="form.job_category" class="form-control" v-on:change="submit">
          <option value>Job Category</option>
          <option
            v-for="cat in job_categories"
            v-bind:key="cat.ID"
            :value="cat.ID"
          >{{ cat.Name.replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); }) }}</option>
        </select>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-12 col-12 form-group">
        <select v-model="form.edulevels" class="form-control filter" v-on:change="submit">
          <option value>Education Level</option>
          <option v-for="edulevel in edulevels" v-bind:key="edulevel.name" :value="edulevel.name">{{ edulevel.name }}</option>
        </select>
      </div>
        <div class="col-lg-2 col-md-2 col-sm-12 form-group">
        <select v-model="form.job_type" class="form-control" v-on:change="submit">
          <option value>Job Type</option>
          <option
            v-for="type in job_type"
            v-bind:key="type.name"
            :value="type.name"
          >{{ type.name }}</option>
        </select>
        </div>
      <div class="col-lg-2 col-md-2 col-sm-12 col-12 form-group">
        <select v-model="form.clevels" class="form-control filter" v-on:change="submit">
          <option value>Career Level</option>
          <option v-for="level in clevels" v-bind:key="level.name" :value="level.name">{{ level.name }}</option>
        </select>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-12 col-12 form-group">
        <select v-model="form.status" class="form-control filter" v-on:change="submit">
          <option value>Status</option>
          <option v-for="state in status" v-bind:key="state.id" :value="state.id">{{ state.name }}</option>
        </select>
      </div>
      <div class="col-lg-1 col-md-1 col-sm-12 col-12 text-center d-none d-md-block">
        <button class="btn btn-rufous" v-on:click="reset">Reset</button>
      </div>
    </div>
  </form>
</template>


<script>
export default {
  props: ["action","categories"],
  data() {
    return {
      edulevels: [
      {
        name: 'Certificate'
      },
      {
        name: 'Diploma'
      },
      {
        name: 'Associate Degree'
      },
      {
        name: 'Bachelors Degree'
      },
      {
        name: 'Masters Degree'
      },
      {
        name: 'Doctrate Degree'
      }
      ],
      job_type: [
      {
        name: 'Permanent'
      },
      {
        name: 'Full Time'
      },
      {
        name: 'Part Time'
      },
      {
        name: 'Contract'
      }
      ],
      clevels: [
      {
        name: 'Entry Level'
      },
      {
        name: 'Mid Level'
      },
      {
        name: 'Management'
      },
      {
        name: 'Senior Management'
      },
      {
        name: 'Executive'
      }
      ],
      status:[
      {
        name: 'Application Sent',
        id: 1
      },
      {
        name: 'Application Received',
        id: 2
      },
      {
        name: 'Interview Scheduled',
        id: 3
      },
      {
        name: 'Placed',
        id: 4
      },
      {
        name: 'Unsuccesful',
        id: 5
      }
      ],
      "job_categories": [],
      form: {
        edulevels: "",
        release: "",
        job_type: "",
        clevels: "",
        job_category:"",
        status:""
      }
    };
  },
  created() {
    //Set query params
    const urlParams = new URLSearchParams(window.location.search);
    this.form.edulevels = urlParams.get("edulevels") ? urlParams.get("edulevels") : "";
    this.form.release = urlParams.get("release")
      ? urlParams.get("release")
      : "";
    this.form.job_type = urlParams.get("job_type")
      ? urlParams.get("job_type")
      : "";
    this.form.clevels = urlParams.get("clevels") ? urlParams.get("clevels") : "";
    this.form.job_category = urlParams.get("job_category") ? urlParams.get("job_category") : "";
    this.form.status = urlParams.get("status") ? urlParams.get("status") : "";
    //Convert to json
    this.job_categories = JSON.parse(this.categories);
  },
  methods: {
    submit: function() {
      //Construct query
      let query =
        "?edulevels=" +
        this.form.edulevels +
        "&release=" +
        this.form.release +
        "&job_type=" +
        this.form.job_type +
        "&clevels=" +
        this.form.clevels +
        "&status=" +
        this.form.status +
        "&job_category=" +
        this.form.job_category;
      const url = encodeURI(
        location.protocol + "//" + location.host + location.pathname + query
      );
      window.location.href = url;
    },
    reset: function() {
      const url = encodeURI(
        location.protocol + "//" + location.host + location.pathname
      );
      window.location.href = url;
    }
  }
};
</script>
