memberApp = new Vue({
  el:'#expCert',
    data: {
      cert: [{
        name: '',
        nameShort: '',
        dateExp: ''
      }],
      members: [{
        fullname : '',
        station: '',
        radioNum :'',
        email : '',
        phone: ''
      }]
  },

  methods: {
    fetchCert(){
      fetch("api/certReport.php")
      .then(response => response.json())
      .then(data => {
        this.cert = data;
        console.log(this.cert);
      });
    },

    fetchMem(){
      fetch("api/memReport.php")
      .then(response => response.json())
      .then(data => {
        this.members = data;
        console.log(this.members);
      });
    }


  },


  created(){
    this.fetchCert();
    this.fetchMem();

  }

});
