package q1.MaxHeap;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-17 18:40
 */
public abstract class AbstractArrayBasedHeap<E> {
    /********* CLASS VARIABLES ************************************************/
    protected E[] heap = null;
    protected static final int MIN_CAPACITY = 15;//min # elements in heap
    protected int capacity = MIN_CAPACITY;
    protected int heapSize = 0;//# of elements stored in heap

/********* GETTERS AND SETTERS ********************************************/
    /**
     * Uses lazy instantiation to create generic array to represent heap. Initialized
     * to the min capacity.
     *
     * @return
     */
    protected E[] getHeap() {
        if (heap == null) {
            Object[] o = new Object[MIN_CAPACITY];
            heap = (E[]) o;//need to cast since you can't initialize generic arrays
        }
        return heap;
    }

    protected void setHeap(E[] heap) {
        this.heap = heap;
    }

    public int getHeapSize() {
        return heapSize;
    }

    public void setHeapSize(int heapSize) {
        this.heapSize = heapSize;
    }

    public int getCapacity() {
        return capacity;
    }
/**************** METHODS ********************************************/
    /**
     * Compares the size of the heap to its current capacity. If the heap is more than
     * 75% full, it doubles its capacity. If it is lesss than 25% full, it halves
     * its capacity. It will never be less than the min capacity
     */
    protected void updateCapacity() {
        double percentFilled = (double) heapSize / capacity;
        if (percentFilled > .75) {
            increaseCapacity();
        } else if (percentFilled < .25 && capacity > 2 * MIN_CAPACITY) {
            decreaseCapacity();
        }
    }

    /**
     * Creates a new array that is double the capacity of the current heap array, copies the
     * existing array's values into it, and then sets the new array as the heap.
     */
    protected void increaseCapacity() {
        Object[] o = new Object[getCapacity() * 2];
        E[] newHeap = (E[]) o;
        for (int i = 0; i < getHeapSize(); i++) {
            newHeap[i] = getHeap()[i];
        }
        setHeap(newHeap);
    }

    /**
     * Creates a new array that is half the capacity of the current heap array copies the
     * existing array's values into it, and then sets the new array as the heap.
     */
    protected void decreaseCapacity() {
        Object[] o = new Object[getCapacity() / 2];
        E[] newHeap = (E[]) o;
        for (int i = 0; i < getHeapSize(); i++) {
            newHeap[i] = getHeap()[i];
        }
        setHeap(newHeap);
    }

    /**
     * Calculates the parent index for the child index passed in. This is done
     * by subtracting 1 from the child index and then dividing this result by 2.
     * Since we are dividing two integers, the result will also be a truncated
     * integer. We must first check to see if the child index is the root (0), in
     * which case we return -1, indicating it is the root;
     *
     * @return
     */
    protected int calculateParentIndex(int childIndex) {
        int parentIndex = -1; //assumes childIndex is the root
        if (childIndex > 0) {
            parentIndex = (childIndex - 1) / 2;
        }
        return parentIndex;
    }

    /**
     * Calculates the left child index for the parent index passed in. This is done
     * by multiplying the parent index by 2 and adding 1.
     *
     * @return
     */
    protected int calculateLeftChildIndex(int parentIndex) {
        return parentIndex * 2 + 1;
    }

    /**
     * Calculates the left child index for the parent index passed in. This is done
     * by multiplying the parent index by 2 and adding 2.
     *
     * @return
     */
    protected int calculateRightChildIndex(int parentIndex) {
        return parentIndex * 2 + 2;
    }

    /**
     * Swaps the parent and child elements in the heap array.
     *
     * @param parentIndex
     * @param childIndex
     */
    protected void swap(int parentIndex, int childIndex) {
        E temp = getHeap()[parentIndex];
        getHeap()[parentIndex] = getHeap()[childIndex];
        getHeap()[childIndex] = temp;
    }
}
