class Index{
    constructor(){
        this.events();
    }

    events(){
        jQuery("#submit").on('click',()=>{
            this.getPrevData();
            
        })
    }

   getPrevData(){

       
        var getData;
        var email = jQuery('#email').val();
        var name = jQuery('#name').val();
        var postID = jQuery("#postID").data('id');
        console.log(js_data.root_url + "/wp-json/wp/v2/campaign/"+postID)
    
        jQuery.ajax({
            beforeSend : (xhr) => {
                xhr.setRequestHeader("X-WP-Nonce",js_data.nonce)
            },
            url : js_data.root_url + "/wp-json/wp/v2/campaign/"+postID,
            type : "GET",
            data: getData,
            success: (res)=> {
                this.getData = res.acf.campaign_data.body;
                console.log( );
                this.getData.push([{'c' : name},{'c' : email}]);
                    this.emailData = {
                        'fields': {
                            'campaign_data':{
                                'body': this.getData
                            }
                        }
                    }
                    console.log(this.emailData);
                    this.submitForm(this.emailData,this.postID);
            },
        
                
            error: (res) => {
                console.log("Error");
                console.log(res);
            }
        })


        /*this.emailData = {
                    'fields': {
                        'campaign_data':{
                            'body': [
                                [{'c':'nav@gmail.com'},{'c' : 'nav'}]
                            ]
                        }
                }
            };*/

        
        
    }

     checkIfObjEmpty(obj) {
        for (var key in obj) {
            if (obj[key] !== null && obj[key] != "")
                return false;
        }
        return true;
    }

    submitForm(data,postID){
       
        var postID = jQuery("#postID").data('id');
        console.log(js_data.root_url + "/wp-json/wp/v2/campaign/"+postID)
        jQuery.ajax({
            beforeSend : (xhr) => {
                xhr.setRequestHeader("X-WP-Nonce",js_data.nonce)
            },
            url : js_data.root_url + "/wp-json/wp/v2/campaign/"+postID,
            type : "POST",
            data: data,
            success: (res)=> {
                console.log(this.data);
                console.log("Success");
                console.log(res);
                alert("form submited successfully");
            },
            error: (res) => {
                console.log("Error");
                console.log(res);
                alert("Some error occurred please try again later")
            }
        })
    }
}


new Index();
