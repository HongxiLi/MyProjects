package q1.MinHeap;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-17 22:32
 */
public class MinHeapTester {

    public void runTests(){
        MinHeap<String> heap = new MinHeap<String>();
        heap.addElement("John");
        heap.addElement("Paul");
        heap.addElement("George");
        heap.addElement("Ringo");
        heap.addElement("Elmer");
        heap.addElement("Zorro");
        System.out.println(heap);
        heap.removeMin();
        System.out.println(heap);
    }
    public static void main(String[] args) {
        MinHeapTester mht = new MinHeapTester();
        mht.runTests();
    }
}

