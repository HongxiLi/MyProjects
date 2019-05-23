package q1.MinHeap;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-17 22:33
 */
public interface MinHeapInterface<E> {
    /**
     * Removes the maximum element from the heap and returns it.
     * @return
     */
    public E removeMin();

    /**
     * Adds the element passed in to the heap and puts it in its proper location in
     * the heap.
     * @param element
     */
    public void addElement(E element);

    /**
     * Swaps the element at the index position passed in with the greater of its two
     * children if one of the children have a greater value.
     * @param index
     */
    public void downMinHeapify(int index);
    /**
     * Swaps the element at the index position passed in with its parent if the value
     * of the element stored at the index is larger than its parent.
     * @param index
     */
    public void upMinHeapify(int index);
}