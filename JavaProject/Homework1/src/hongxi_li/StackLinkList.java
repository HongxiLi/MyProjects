package hongxi_li;

import edu.princeton.cs.algs4.Stack;

/**********************
 * @author Hongxi Li
 * @id 001893090
 ********************/

public class StackLinkList {
	    
	    //homework1_7
	
	    private int n = 0;
	    private Node first = null;

	    public boolean isEmpty(){
	        return first == null;
	    }

	    public void push(int age, String name)
	    {
	        Node oldfirst = first;
	        first = new Node();
	        first.age = age;
	        first.name = name;
	        first.next = oldfirst;
	    }

	    public Node pop() {
	        Node nod = new Node();
	        nod.setName(first.name);
	        nod.setAge(first.age);
	        first = first.next;
	        return nod;
	    }


	    class Node{
	        private int age;
	        private String name;
	        private Node next;

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

	    public static void main(String[] args) {
	        // TODO code application logic here
	        StackLinkList s = new StackLinkList();
	        s.push(31, "Name1");
	        s.push(24, "Name2");
	        s.push(10, "Name3");
	        s.push(44, "Name4");
	        s.push(81, "Name5");

	        for(int i = 0; i<5; i++){
	            System.out.println(s.pop());
	        }
	    }

	}