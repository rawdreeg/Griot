import Token from "./Token";
import AppStorage from './AppStorage'

class User{
    login(formData){
        const endpoint = 'http://127.0.0.1:8000/api/auth/login'
        axios.post(endpoint, formData)
        .then(res => {
            this.processResponse(res)
            window.location = '/discussion'
        })
        .catch(error => console.log('err', error.response.data))
    }

    processResponse(res){
        const accessToken = res.data.access_token
        const username = res.data.user
        if(Token.validate(accessToken)){
            AppStorage.store(username, accessToken)
        }
    }

    checkToken(){
        const storedToken = AppStorage.getToken()

        if(storedToken){
            return Token.validate(storedToken)
        }

        return false
    }

    isLoggedIn(){
        return this.checkToken()
    }

    logout(){
        AppStorage.clear()
        window.location = '/discussion'
    }

    name(){
        if(this.isLoggedIn()){
            return AppStorage.getUserData()
        }

    }

    id(){
        if(this.isLoggedIn()){
            const storedToken = AppStorage.getToken()
            if(storedToken){
                const payload = Token.payload(storedToken)
                return payload.sub                
            }
        }

    }

    own(id){
        return this.id() == id
    }




}
 
export default User = new User() 