package hongxi_li;

/**********************
 * @author Hongxi Li
 * @id 001893090
 ********************/

public class StackArray {

	    //homework1_8
	    private int size;
	    private int top = -1;
	    private Node[] arr;

	    public static void main(String[] args) {
	        // TODO code application logic here
	        StackArray s = new StackArray();
	        Node n1 = new Node();
	        Node n2 = new Node();
	        Node n3 = new Node();
	        Node n4 = new Node();
	        Node n5 = new Node();
	        n1.setName("Name1");
	        n1.setAge(31);
	        n2.setName("Name2");
	        n2.setAge(24);
	        n3.setName("Name3");
	        n3.setAge(10);
	        n4.setName("Name4");
	        n4.setAge(44);
	        n5.setName("Name5");
	        n5.setAge(81);
	        s.push(n1);
	        s.push(n2);
	        s.push(n3);
	        s.push(n4);
	        s.push(n5);
	        
	        for(int i = 0; i<5; i++){
	            System.out.println(s.pop());
	        }
	    }
	    public StackArray()
	    {
	        size = 5;
	        arr = new Node[5]; 
	    }
	    
	    public void push(Node data){
	  if(top >= size-1){
	   System.out.println("stack is full");
	   return;
	  }
	  arr[++top] = data;
	 }
	    public Node pop(){
	  if(top < 0){
	   throw new RuntimeException("stack is empty");
	  }
	  else{
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


