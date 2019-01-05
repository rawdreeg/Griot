class AppStorage{

    store(user, token){
        localStorage.setItem('token', token)
        localStorage.setItem('userData', user)
    }

    clear(){
        localStorage.removeItem('token')
        localStorage.removeItem('userData')
    }

    getToken(){
        return localStorage.getItem('token')
    }

    getUserData(){
        return localStorage.getItem('userData')
    }

}

export default AppStorage = new AppStorage()