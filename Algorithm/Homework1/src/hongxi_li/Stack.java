package hongxi_li;

/**********************
 * @author Hongxi Li
 * @id 001893090
 ********************/

public class Stack {
	
	//homework1_9
    
    private int size;
    private int top = -1;
    private Node[] arr;

    public Stack()
    {
        size = 5;
        arr = new Node[5]; 
    }
    
    public static void main(String[] args) {
        // TODO code application logic here
    }
    private void resize(int capacity)
    {
        Node[] copy = new Node[capacity];
        for (int i = 0; i < size; i++)
            copy[i] = arr[i];
        arr = copy;
    }
    
    public void push(Node data){
        if (size == arr.length)
        {
            resize(2 * arr.length);
        }
        if(top >= size-1)
        {
            System.out.println("stack is full");
            return;
 }
        arr[++top] = data;
 }
    public Node pop()
    {
 if(top < 0)
        {
            throw new RuntimeException("stack is empty");
 }
 else{
            if (size > 0 && size == arr.length/4) 
                resize(arr.length/2);
            Node nod = arr[top];
            arr[top] = null;
            top--;
            return nod;
            }
 }
    public boolean isEmpty(){
  return top == -1;
 }
}

       class Node {
    
        private int age;
        private String name;

        public void Node(int age, String name){
            this.age = age;
            this.name = name;
        }

        public int getAge() {
            return age;
        }

        public void setAge(int age) {
            this.age = age;
        }

        public String getName() {
            return name;
        }

        public void setName(String name) {
            this.name = name;
        }
        
        @Override
        public String toString() {
            return "(" + age + ", " + name + ")";
        }
    }
