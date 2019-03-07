package hongxi_li;
import java.util.LinkedList;

public class LinkedListMethodsDemo {
	public static void main(String[] args) {
        LinkedList<String> linkedList = new LinkedList<>();
 
        linkedList.push("23 name1");
        linkedList.push("45 name2");
        linkedList.push("47 name3");
        linkedList.push("24 name4");
        linkedList.push("78 name5");
        linkedList.push("67 name6");
        System.out.println("linkedList: " + linkedList);
 
        System.out.println("pop: " + linkedList.pop());
        System.out.println("after pop: " + linkedList);
 
        System.out.println("poll: " + linkedList.poll());
        System.out.println("after poll: " + linkedList);
    }


}
