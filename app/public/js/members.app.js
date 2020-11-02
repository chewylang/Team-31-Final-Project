memberApp = new Vue({
  el:'#getMember',
    data: {
      member: [{
        firstname: '',
        lastname:'',
        gender:'',
        radioNum: '',
        addressStreet:'',
        addressCity: '',
        addressState: '',
        adressZip:'',
        station:'',
        email:'',
        phone:''
      }],
      newMember: {
        firstname : '',
        lastname : '',
        gender : '',
        addressStreet : '',
        addressCity : '',
        addressState : '',
        adressZip : '',
        radioNum : '',
        station:'',
        email:'',
        phone:''
      },
      selected: {
        fullname:'',
        nameShort :'',
        dateObtained:'',
        dateRenewed:'',
        dateExp:'',
        stdExpire:''
      },
      selectedReturn: [{
        fullname:'',
        stdExpire:'',
        nameShort :'',
        dateObtained:'',
        dateRenewed:'',
        dateExp:''
      }]
  },

  methods: {
    fetchMember(){
      fetch("api/viewMember.php")
      .then(response => response.json())
      .then(data => {
        this.member = data;
        console.log(this.member);
      });
    },

    addMember(){
        fetch('api/addMem.php', {
          method:'POST',
          body: JSON.stringify(this.newMember),
          headers : {
            "Content-Type": "application/json; charset=utf-8"
          }
        })
        .then(response => response.json())
        .then(json => {
          console.log("Returned from post:", json);
          this.member.push(json[0]);
          this.newMember = this.newMemberData();
        });
        console.log("Creating (POSTing)...!");
        console.log(this.nemMember);
      },
    newMemberData(){
      return {
        firstname: '',
        lastname: '',
        gender:'',
        addressStreet:'',
        addressCity: '',
        addressState: '',
        adressZip:'',
        radioNum: '',
        station:'',
        email:'',
        phone:''
      };
    },
    findMem(){
    fetch('api/viewMemCert.php', {
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
      stdExpire:'',
      fullname:'',
      nameShort :'',
      dateObtained:'',
      dateRenewed:'',
      dateExp:''
    };
    }

  },


  created(){
    this.fetchMember();
  }

});
