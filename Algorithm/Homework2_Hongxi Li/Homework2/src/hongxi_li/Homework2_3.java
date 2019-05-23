/**
 * @author: Hongxi Li
 * @id: 001893090
 * @Date: 12:25:53 AM
 */
package hongxi_li;

public class Homework2_3 {
	
	public static void main(String[] args) {
		
		//linkedlist implements queue

        LinkListQueue queue = new LinkListQueue();

        queue.enqueue("item1");
        queue.enqueue("item2");
        queue.enqueue("item3");
        queue.enqueue("item4");
        queue.displayQueue();
        queue.dequeue();
        queue.displayQueue();
        
        queue.dequeue();
        queue.displayQueue();  
        
        queue.dequeue();
        queue.displayQueue();
        
        
        System.out.println("Queue is empty?\t" + queue.isEmpty());
//        System.out.println("First dequeued item is "+ queueImpl.displayQueue().data);
        

    }
	
	public static class LinkListQueue {

	    LinkList newLinkList = new LinkList();

	    public <T> void enqueue(T data) {
	        newLinkList.addLast(data);
	    }

	    public void dequeue() {
	        if(!newLinkList.isEmpty())
	            newLinkList.removeFirst();

	    }

	    public void displayQueue() {
	        newLinkList.displayList();
	        System.out.println();
	    }

	    public boolean isEmpty(){
	        return newLinkList.isEmpty();
	    }

	}
	
	public static class LinkList {

	    private static class Node<T> {

	        private final T data;
	        private Node next;

	        public Node(T data){
	            this.data=data;
	        }


	        public void displayNode(){
	            System.out.print(data+ " ");
	        }

	    }

	    private Node first = null;
	    private Node last = null;

	    public boolean isEmpty() {
	        return (first == null);
//	        System.out.println();
	    }

	    public <T> void addLast(T data) {
	        Node n = new Node(data);
	        if (isEmpty()) {
	            n.next = first;
	            first = n;
	            last = n;
	        } else {
	            last.next = n;
	            last = n;
	            last.next = null;
	        }

	    }

	    public void removeFirst() {

	            Node temp = first;
	            if (first.next == null)
	                last = null;
	            first = first.next;

	        }


	    public void displayList() {
	        Node current = first;
	        while (current != null) {
	            current.displayNode();
	            current = current.next;
	        }
	    }

	}

}
