class Node
{
    constructor(data, num){
        this.count = num;
        this.data = data;
        this.next = null;
    }
}

class Todo
{
    static count = 0
    static head = new Node("dammy", Todo.count++);

    static createList(task){
        Todo.getLastItem().next = new Node(task, Todo.count++);
    }

    static getLastItem(){
        let itr = this.head;
        while(itr.next != null) itr = itr.next;
        return itr;
    }

    static toArray(){
        let todoArr = [];
        let itr = this.head.next;
        console.log(itr);
        while(itr != null){
            todoArr.push(itr);
            itr = itr.next;
        }
        return todoArr;
    }

    static deleteNode(index){
        let itr = this.head;
        if(itr.count == index) {
            console.log("worked");
            this.head = itr.next;
            console.log(this);
        }
        else{
            while(itr.next.count != index) itr = itr.next;
            itr.next = itr.next.next;
        }
        // return this.head;
    }
}

var app = new Vue({
    el: '#app',
    data: {
        task: '',
        allData: '',
        error: '',
    },
    methods: {

        fetchAllData: function(){
            axios
            .get('config/select.php')
            .then(res => this.allData = res.data)
            .catch(error => {
                this.error = error;
                console.log(error);
            })
        },

        insertData: function(){

            axios.post('config/fetchData.php', {
                title: this.task,
                action: "insert",
            })
            .then(res => {
                if(res.data.message === 'success'){
                    alert('Registered correctly');
                    console.log(res.data);
                    this.task = "";
                    this.fetchAllData();
                } else {
                    alert(res.data.message);
                }
            }). catch(error => {
                this.error = error;
                console.log(error);
            })

        },

        deleteData(id){
            console.log(id);
            $yesOrNo = confirm('Are you sure you want to delete?');
            if(!$yesOrNo) return;

            axios
            .post('config/fetchData.php', {
                id: id,
                action: "delete",
            })
            .then(res => {
                if(res.data.message === 'success'){
                    alert('successfully deleted');
                    this.fetchAllData();
                } else {
                    alert(res.data.message);
                }
            }) .catch(error => {
                this.error = error;
                console.log(error);
            })
        }

    },
    mounted(){
        axios
        .get('config/select.php')
        .then(res => {
            this.allData = res.data;
            // console.log(this.allData);
        })
        .catch(error => {
            this.error = error;
            console.log(error);
        })
    }
});