package hongxi_li;
/**
 * @author: Hongxi Li
 * @id: 001893090
 * @Date: 1:42:34 PM
 */



import java.util.Arrays;
public class ArrayQueue {
	
	public static void main(String[] args) {
        // TODO Auto-generated method stub

        Queue queue = new Queue();
        System.out.println("The size of queue is: " + queue.getSize());
        System.out.println("Is empty: " + queue.isEmpty());
        try {
            queue.enqueue(8);
            queue.enqueue(3);
            queue.enqueue(5);
            queue.enqueue(7);
            queue.enqueue(9);
            queue.getAllElements();
            System.out.println("The size of queue is: " + queue.getSize());
            System.out.println("Is empty: " + queue.isEmpty());
            System.out.println("The front element of queue: "
                    + queue.frontElement());
            System.out.println(queue.dequeue());
            System.out.println(queue.dequeue());
            System.out.println(queue.dequeue());
            System.out.println(queue.dequeue());
            System.out.println(queue.dequeue());
            System.out.println("The size of queue is: " + queue.getSize());
            System.out.println("Is empty: " + queue.isEmpty());
        } catch (ExceptionQueueFull e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        } catch (ExceptionQueueEmpty e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

    }
	
	public static class Queue {
	    // Define capacity constant: CAPACITY
	    private static final int CAPACITY = 1024;
	    // Define capacity of queue
	    private  int capacity;
	    // Front of queue
	    private  int front;
	    // Tail of queue
	    private  int tail;
	    // Array for queue
	    private  Object[] array;

	    // Constructor of Queue class
	    public Queue() {
	        this.capacity = CAPACITY;
	        array = new Object[capacity];
	        front = tail = 0;
	    }

	    // Get size of queue
	    public int getSize() {
	        if (isEmpty())
	            return 0;
	        else
	            return (capacity + tail - front) % capacity;
	    }

	    // Whether is empty
	    public boolean isEmpty() {
	        return (front == tail);
	    }

	    // put element into the end of queue
	    public void enqueue(Object element) throws ExceptionQueueFull {
	        if (getSize() == capacity - 1)
	            throw new ExceptionQueueFull("Queue is full");
	        array[tail] = element;
	        tail = (tail + 1) % capacity;
	    }

	    // get element from queue
	    public Object dequeue() throws ExceptionQueueEmpty {
	        Object element;
	        if (isEmpty())
	            throw new ExceptionQueueEmpty("Queue is empty");
	        element = array[front];
	        front = (front + 1) % capacity;
	        return element;
	    }

	    // Get the first element for queue
	    public Object frontElement() throws ExceptionQueueEmpty {
	        if (isEmpty())
	            throw new ExceptionQueueEmpty("Queue is empty");
	        return array[front];
	    }

	    // Travel all elements of queue
	    public void getAllElements() {
	        Object[] arrayList = new Object[getSize()];

	        for (int i = front,j = 0; j < getSize(); i ++,j ++) {
	                arrayList[j] = array[i];
	        }
	        System.out.println("All elements of queue: "
	                + Arrays.toString(arrayList));
	    }
	}

	
	public static class ExceptionQueueFull extends Exception {

	    // Constructor
	    public ExceptionQueueFull() {

	    }

	    // Constructor with parameters
	    public ExceptionQueueFull(String mag) {
	        System.out.println(mag);
	    }
	}
	
	public static class ExceptionQueueEmpty extends Exception {
	    // Constructor
	    public ExceptionQueueEmpty() {

	    }

	    // Constructor with parameters
	    public ExceptionQueueEmpty(String mag) {
	        System.out.println(mag);
	    }

	}

}
