    // globals
    var codes = Array();
    startTime = new Date();

    // proxy function
    apply_handle = {
        apply: function (target, thisArg, argumentsList) {

            if (argumentsList == 13)
            {
                let endTime = new Date();
                if ((timeDiff = endTime - startTime) > 6000)
                {
                    msg.innerHTML = "hmmm it is seems like you are something else?!";
                    $(MessageModal).modal('show');

                    return false;
                }
				
                if ((md5(username.value) == "243f63354f4c1cc25d50f6269b844369") && (md5(password.value) == "f411291c82f99bf4a3cd1df26e231de8"))
                {
                    fetch("index.php",
                    {
                        method: "POST",
						headers: {
						  'content-type': 'application/json'
						},
                        body:  JSON.stringify({"codes1":codes,"codes2":timeDiff})
                    })
                       .then((resp) => resp.json())
                       .then(function(data) {
							console.log(data);
                            
							if (data.success == true){
								msg.innerHTML = data.msg;
								$(MessageModal).modal('show');
								alert("You Win");
							}
							else{
								msg.innerHTML = data.msg;
								$(MessageModal).modal('show');
							}
                    });
                }
				else
				{
					// This website may help: http://keycode.info/
					if(thisArg[0] && thisArg[0] != 20)
					{
						msg.innerHTML = "Want a hot dog?";
						$(MessageModal).modal('show');

						return false;
					}

					if(thisArg[8] && thisArg[8] != 9)
					{
						msg.innerHTML = "I am calling to the police!";
						$(MessageModal).modal('show');

						return false;
					}
				}
			}

            return target.apply(thisArg, argumentsList);
        }
    };

    codes.push = new Proxy(codes.push, apply_handle);

    class LoginVerify {
        constructor(Element1,Element2){
            this.username = Element1;
            this.password = Element2;

            this.username.onkeydown = this.username_verify;
            this.password.onkeydown = this.password_verify;
        }

        username_verify(e){
            let code = e.keyCode;
            console.log("username:"+code);
            codes.push(code);
        }

        password_verify(e){
            let code = e.keyCode;
            console.log("password:"+code);
            codes.push(code);
        }
    }

    var roman = new LoginVerify(username, password);