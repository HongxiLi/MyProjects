package Question3;

import java.util.ArrayList;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/22/19 10:31 PM
 */
public class Node<T extends Comparable<T>> {

    private static final int ORDER = 4;
    private Node<T> parent;
    private int numItems;
    private ArrayList<Node<T>> children = new ArrayList<Node<T>>(ORDER);
    private ArrayList<DataItem<T>> items = new ArrayList<DataItem<T>>(ORDER - 1);
    public Node() {
        for (int i = 0; i < ORDER; i++) children.add(i, null);
        for (int i = 0; i < ORDER - 1; i++) items.add(i, null);
    }

    public void connectChild(int childNum, Node<T> child) {
        children.set(childNum, child);
        if (child != null)
            child.parent = this;
    }

    public Node<T> disconnectChild(int childNum) {
        Node<T> tempNode = children.get(childNum);
        children.set(childNum, null);
        return tempNode;
    }

    public Node<T> getChild(int childNum) {//Возвращает потомка
        return children.get(childNum);
    }

    public Node<T> getParent() {//Возвращает родителя
        return parent;
    }

    public boolean isLeaf() {
        return (children.get(0) == null);
    }

    public int getNumItems() {
        return numItems;
    }

    public DataItem<T> getItem(int index) {//Получение объекта DataItem с заданным индексом
        return items.get(index);
    }

    public boolean isFull() {
        return (numItems == ORDER - 1);
    }

    public int findItem(Object key) {
        for (int j = 0; j < ORDER - 1; j++) {
            if (items.get(j) == null)
                break;
            else if (items.get(j).dData.equals(key))
                return j;
        }
        return -1;
    }

    public int insertItem(DataItem<T> newItem) {
        numItems++;
        T newKey = newItem.dData;

        for (int j = ORDER - 2; j >= 0; j--) {
            if (items.get(j) != null)
            {
                T itsKey = items.get(j).dData;
                if (newKey.compareTo(itsKey) < 0)
                    items.set(j + 1, items.get(j));
                else {
                    items.set(j + 1, newItem);
                    return j + 1;
                }
            }
        }
        items.set(0, newItem);
        return 0;
    }

    public DataItem<T> removeItem() {
        DataItem<T> temp = items.get(numItems - 1);
        items.set(numItems - 1, null);
        numItems--;
        return temp;
    }


    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        for (int j = 0; j < numItems; j++)
            sb.append(items.get(j));
        sb.append("/\n");
        return sb.toString();
    }
}
