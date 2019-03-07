package hongxi_li;
/**
 * @author: Hongxi Li
 * @id: 001893090
 * @Date: 1:55:25 PM
 */

public class Homework2_4 {
	
	//array implements enqueue, dequeue
	
	private static final int MAX_SIZE = 100;
    private Object[] queue;        //队列
    private int front;             //头指针
    private int rear;              //尾指针
    private int length;            //队列初始化长度
    
    //初始化队列
    private void init(){
        queue = new Object[this.length + 1]; 
        front = rear = 0;
    }
    //入队
    public void enqueue(Object object) throws Exception{
        if(isFull()){
            throw new Exception("入队失败!队列已满!");
        }
        queue[rear] = object;
        rear = (rear + 1) % queue.length;
    }
    //出队
    public Object dequeue() throws Exception{
        if(isEmpty()){
            throw new Exception("出队失败!队列为空!");
        }
        Object object = queue[front];
        queue[front] = null;  //释放对象
        front = (front + 1) % queue.length;
        return object;
    }
    //清空队列
    public void clear(){
        queue = null;
        queue = new Object[this.length];
    }
    //获得队列当前大小
    public int size(){
        return (rear - front + queue.length ) % queue.length;
    }
    //判断队列是否已满
    public boolean isFull(){
        return (rear + 1) % queue.length == front;
    }
    //判断队列是否为空
    public boolean isEmpty(){
        return front == rear;
    }
    public Homework2_4(){
        this.length = MAX_SIZE;
        init();
    }
    public Homework2_4(int length){
        this.length = length;
        init();
    }

    public static void main(String[] args) throws Exception {
        Homework2_4 queue = new Homework2_4(5);
        
        queue.enqueue(4);
        queue.dequeue();
        queue.enqueue(56);
        queue.enqueue(2);
        queue.enqueue(67);
        queue.dequeue();
        queue.dequeue();
//        queue.clear();



        try {
            System.out.println("Queue Size:" + queue.size());
            System.out.println("---------------------");
            while(!queue.isEmpty()){
             System.out.println("dequeue data:" + queue.dequeue());
            }
            System.out.println("Queue is empty?\t" + queue.isEmpty());
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}


