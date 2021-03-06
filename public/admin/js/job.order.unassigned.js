var jobOrderUnassigned = new Vue ({
  el : "#nv-jo-list-unassigned" ,
  data : {
    jobOrderList : []
  } ,
  methods : {
    loadJobOrders : function(){
      const t  = this;
      axios.
      get('/admin/job/list/unassigned').
      then(function (response) {
        t.jobOrderList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });

    } ,
    pad : function(value) {
      return pad(value , 10);
    }
  } ,
  mounted (){
    this.loadJobOrders();
  }
})
