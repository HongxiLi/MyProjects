package q1.MaxHeap;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-17 22:34
 */
public class MaxHeap<E> extends AbstractArrayBasedHeap<E> implements MaxHeapInterface<E>{
    @Override
/**
 * Removes the root element from the max heap and returns it. In the process,
 * it replaces the root element with the last element in the heap and then calls
 * downMinHeapify on it.
 */
    public E removeMax() {
        E element = null;
        if (getHeapSize() > 0){
            element = getHeap()[0];
            getHeap()[0] = getHeap()[getHeapSize()-1];//bring last elemetn to top
            downMaxHeapify(0);//down heapify the root so it sinks to the proper location
            setHeapSize(getHeapSize()-1);
        }
        return element;
    }

    @Override
    public void addElement(E element) {
        updateCapacity();
        int nextIndex = getHeapSize();
        getHeap()[nextIndex] = element;
        upMaxHeapify(nextIndex);
        setHeapSize(getHeapSize() + 1);
    }

    @Override
    public void downMaxHeapify(int index) {
        int leftChildIndex = calculateLeftChildIndex(index);
        int rightChildIndex = calculateRightChildIndex(index);
        Comparable<E> leftChild = null;
        Comparable<E> rightChild = null;
        Comparable<E> node = (Comparable<E>)getHeap()[index];
        if (leftChildIndex < getHeapSize()){
            leftChild = (Comparable<E>)getHeap()[leftChildIndex];
        }
        if(rightChildIndex < getHeapSize()){
            rightChild = (Comparable<E>)getHeap()[rightChildIndex];
        }
        int testIndex = index;
        if(leftChild != null && rightChild != null){
            //both children exist...see which one is greater
            if(leftChild.compareTo(getHeap()[rightChildIndex])< 0){
                testIndex = rightChildIndex;
            }else{
                testIndex = leftChildIndex;
            }
        }else if (leftChild != null){
            //only left child exists
            testIndex = leftChildIndex;
        }else if(rightChild != null){
            //only right child exists
            testIndex = rightChildIndex;
        }
        if (testIndex != index){
            swap(index, testIndex);
            downMaxHeapify(testIndex);
        }
    }

    @Override
    public void upMaxHeapify(int index) {
        if (index > 0){
            int parentIndex = calculateParentIndex(index);
            Comparable <E> parentValue = (Comparable<E>)(getHeap()[parentIndex]);
            E childValue = getHeap()[index];
            if (parentValue.compareTo(childValue) < 0){
                //parent less than child, so swap
                swap(parentIndex, index);
                upMaxHeapify(parentIndex);
            }
        }
    }
    @Override
    public String toString() {
        StringBuffer buf = new StringBuffer();
        buf.append("[");
        for (int i=0; i < getHeapSize(); i++){
            buf.append(getHeap()[i]);
            if (i < getHeapSize()-1){
                buf.append(",");
            }
        }
        buf.append("]");
        return buf.toString();
    }
}

