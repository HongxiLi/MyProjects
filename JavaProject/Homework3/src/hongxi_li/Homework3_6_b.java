package hongxi_li;

import java.util.Arrays;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/1/19 4:12 PM
 */
public class Homework3_6_b {

    public static void main(String[] args) {

        CircularQueue<Integer> circularQueue = new CircularQueue(9);

        circularQueue.enqueue(7);
        circularQueue.enqueue(38);
        circularQueue.enqueue(3);
        circularQueue.enqueue(9);
        circularQueue.enqueue(82);
        circularQueue.enqueue(10);
        circularQueue.enqueue(31);
        circularQueue.enqueue(24);


        System.out.println("i) Full Circular Queue" + circularQueue);

        System.out.print("Dequeued following element from circular Queue ");
        System.out.println(circularQueue.dequeue() + " ");

        circularQueue.enqueue(7);

        System.out.println("After enqueueing circular queue with element having value 7");
        System.out.println(circularQueue);
    }



//implementation of Circular Queue using Generics
    static  class CircularQueue<E> {

       private int currentSize; //Current Circular Queue Size
       private E[] circularQueueElements;
       private int maxSize; //Circular Queue maximum size

       private int rear;//rear position of Circular queue(new element enqueued at rear).
       private int front; //front position of Circular queue(element will be dequeued from front).

    public CircularQueue(int maxSize) {
        this.maxSize = maxSize;
        circularQueueElements = (E[]) new Object[this.maxSize];
        currentSize = 0;
        front = -1;
        rear = -1;
    }

    /**
     * Enqueue elements to rear.
     */
    public void enqueue(E item) throws QueueFullException {
        if (isFull()) {
            throw new QueueFullException("Circular Queue is full. Element cannot be added");
        }
        else {
            rear = (rear + 1) % circularQueueElements.length;
            circularQueueElements[rear] = item;
            currentSize++;

            if (front == -1) {
                front = rear;
            }
        }
    }

    /**
     * Dequeue element from Front.
     */
    public E dequeue() throws QueueEmptyException {
        E deQueuedElement;
        if (isEmpty()) {
            throw new QueueEmptyException("Circular Queue is empty. Element cannot be retrieved");
        }
        else {
            deQueuedElement = circularQueueElements[front];
            circularQueueElements[front] = null;
            front = (front + 1) % circularQueueElements.length;
            currentSize--;
        }
        return deQueuedElement;
    }

    /**
     * Check if queue is full.
     */
    public boolean isFull() {
        return (currentSize == circularQueueElements.length);
    }

    /**
     * Check if Queue is empty.
     */
    public boolean isEmpty() {
        return (currentSize == 0);
    }

    @Override
    public String toString() {
        return "CircularQueue [" + Arrays.toString(circularQueueElements) + "]";
    }

}

    static  class QueueFullException extends RuntimeException {

    private static final long serialVersionUID = 1L;

    public QueueFullException() {
        super();
    }

    public QueueFullException(String message) {
        super(message);
    }

}

    static  class QueueEmptyException extends RuntimeException {

    private static final long serialVersionUID = 1L;

    public QueueEmptyException() {
        super();
    }

    public QueueEmptyException(String message) {
        super(message);
    }

}

}

