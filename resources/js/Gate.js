export default class Gate{

    constructor(user){
        this.user = user;
    }

    isAdmin(){
        return this.user.type === 'Admin';
    }

    isDeveloper(){
        return this.user.type === 'Developer';
    }

    isMechanic(){
        return this.user.type === 'Mechanic';
    }

    isUser(){
        return this.user.type === 'User';
    }

    isAdminORDeveloper(){
        if(this.user.type === 'Admin' || this.user.type === 'Developer'){
            return true;
        }
    }

    isAdminORDeveloperORMechanic(){
        if(this.user.type === 'Admin' || this.user.type === 'Developer' || this.user.type === 'Mechanic'){
            return true;
        }
    }

}
