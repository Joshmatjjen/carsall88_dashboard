export default class Gate{

    constructor(user){
        this.user = user;
    }

    isAdmin(){
        return this.user.type === 'admin';
    }

    isDeveloper(){
        return this.user.type === 'developer';
    }

    isMechanic(){
        return this.user.type === 'mechanic';
    }

    isUser(){
        return this.user.type === 'user';
    }

    isAdminORDeveloper(){
        if(this.user.type === 'admin' || this.user.type === 'developer'){
            return true;
        }
    }

    isAdminORDeveloperORMechanic(){
        if(this.user.type === 'admin' || this.user.type === 'developer' || this.user.type === 'mechanic'){
            return true;
        }
    }

}
