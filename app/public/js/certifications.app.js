memberApp = new Vue({
  el:'#getCert',
    data: {
      cert: [{
        nameShort: '',
        stdExpire: ''
      }],
      newCert:{
        nameShort:'',
        stdExpire:''
      },
      selected: {
        fullname:'',
        nameShort :'',
        dateObtained:'',
        dateRenewed:'',
        dateExp:''
      },
      selectedReturn: [{
        fullname:'',
        nameShort :'',
        dateObtained:'',
        dateRenewed:'',
        dateExp:''
      }]
  },

  methods: {
    fetchCert(){
      fetch("api/viewCert.php")
      .then(response => response.json())
      .then(data => {
        this.cert = data;
        console.log(this.cert);
      });
    },
    createCert(){
    fetch('api/addCert.php', {
      method:'POST',
      body: JSON.stringify(this.newCert),
      headers : {
        "Content-Type": "application/json; charset=utf-8"
      }
    })
    .then(response => response.json())
    .then(json => {
      console.log("Returned from post:", json);
      this.cert.push(json[0]);
      this.newCert = this.newCertData();
    });
    console.log("Creating (POSTing)...!");
    console.log(this.newCert);
  },
newCertData(){
  return {
    nameShort:'',
    stdExpire:''
  };
  },
  findMem(){
  fetch('api/viewCertDetails.php', {
    method:'POST',
    body: JSON.stringify(this.selected),
    headers : {
      "Content-Type": "application/json; charset=utf-8"
    }
  })
  .then(response => response.json())
  .then(json => {
    console.log("Returned from post:", json);
    this.selectedReturn = json;
    this.selected = this.newSelectData();
    console.log("Data in return", this.selectedReturn);
  });
  console.log("Creating (POSTing)...!");
  console.log(this.selected);
},
newSelectData(){
  return {
    fullname:'',
    nameShort :'',
    dateObtained:'',
    dateRenewed:'',
    dateExp:''
  };
  }
},

  created(){
    this.fetchCert();
  }

});
