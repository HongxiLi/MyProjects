package Question3;

import java.util.Collection;
import java.util.Iterator;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/22/19 10:31 PM
 */
public class Tree234<T extends Comparable<T>> implements Collection<T>{
    private Node<T> root = new Node<T>();
    private int size = 0;

    public void split(Node<T> thisNode)
    {
        DataItem<T> itemB, itemC;
        Node<T> parent, child2, child3;
        int itemIndex;

        itemC = thisNode.removeItem();
        itemB = thisNode.removeItem();
        child2 = thisNode.disconnectChild(2);
        child3 = thisNode.disconnectChild(3);
        Node<T> newRight = new Node<T>();

        if (thisNode == root)
        {
            root = new Node<T>();
            parent = root;
            root.connectChild(0, thisNode);
        } else
            parent = thisNode.getParent();

        itemIndex = parent.insertItem(itemB);
        int n = parent.getNumItems();

        for (int j = n - 1; j > itemIndex; j--)
        {
            Node<T> temp = parent.disconnectChild(j);
            parent.connectChild(j + 1, temp);

        }
        parent.connectChild(itemIndex + 1, newRight);

        newRight.insertItem(itemC);
        newRight.connectChild(0, child2);
        newRight.connectChild(1, child3);
    }


    public Node<T> getNextChild(Node<T> theNode, T theValue) {
        int j;
        int numItems = theNode.getNumItems();
        for (j = 0; j < numItems; j++) {
            if (theValue.compareTo(theNode.getItem(j).dData) < 0)
                return theNode.getChild(j);
        }
        return theNode.getChild(j);
    }

    public Node<T> find(T key) {
        Node<T> curNode = root;
        while (true) {
            if ((curNode.findItem(key)) != -1)
                return curNode;
            else if (curNode.isLeaf())
                return null;
            else
                curNode = getNextChild(curNode, key);
        }
    }


    public void insert(T dValue) {
        if (find(dValue)==null) {
            Node<T> curNode = root;
            DataItem<T> tempItem = new DataItem<T>(dValue);
            while (true) {
                if (curNode.isFull())
                {
                    split(curNode);
                    curNode = curNode.getParent();
                    curNode = getNextChild(curNode, dValue);
                } else if (curNode.isLeaf())
                    break;

                else
                    curNode = getNextChild(curNode, dValue);

            }

            curNode.insertItem(tempItem);
            size++;
        }
        else
            return;
    }


    public Tree234<T> remove(T dValue) {
        Iterator iter =  this.iterator();
        Tree234 <T> newTree = new Tree234<T>();
        while (iter.hasNext()) {
            T item = (T)iter.next();
            if (!item.equals(dValue)) {
                newTree.insert(item);
            }
        }
        if (!(findMin().getItem(0).dData.equals(dValue)))
            newTree.insert(findMin().getItem(0).dData);
        return newTree;
    }



    public int height() {
        int i = 1;
        if (!this.isEmpty()) {
            Node<T> currentNode = root;
            while (currentNode.getChild(0) != null) {
                currentNode = currentNode.getChild(0);
                i++;
            }
        }
        return i;
    }


    private void recDisplayTree(StringBuilder sb, Node<T> thisNode, int level, int childNumber) {
        sb.append("level=").append(level).append("; child=").append(childNumber).append(" ");
        sb.append(thisNode);


        int numItems = thisNode.getNumItems();
        int i = 0;
        for (int j = 0; j < numItems + 1; j++) {
            Node<T> nextNode = thisNode.getChild(j);
            if (nextNode != null) {
                recDisplayTree(sb, nextNode, level + 1, j);
            }
            else
                return;
        }
    }

    private Node<T> findMin() {
        if (!this.isEmpty()) {
            Node<T> currentNode = root;
            while (currentNode.getChild(0) != null)
                currentNode = currentNode.getChild(0);
            return currentNode;
        }
        else
            return null;
    }

    private Node<T> findMax() {
        if (!this.isEmpty()) {
            Node<T> currentNode = root;
            while ((currentNode.getChild(currentNode.getNumItems())) != null) {
                currentNode = currentNode.getChild(currentNode.getNumItems());
            }
            return currentNode;
        }
        else
            return null;
    }


    public void displayTree() {
        StringBuilder sb = new StringBuilder();
        recDisplayTree(sb, root, 0, 0);
        System.out.println(sb);
    }

    public String toString() {
        StringBuilder sb = new StringBuilder();
        recDisplayTree(sb, root, 0, 0);
        return sb.toString();
    }


    public int size() {
        return size;
    }


    public boolean isEmpty() {
        return size == 0;
    }


    public boolean contains(Object o) {
        try {
            return find((T) o) != null;
        } catch (ClassCastException exception) {
            return false;
        }
    }

    class TreeIterator implements Iterator<T> {
        private Node<T> currentNode;
        private DataItem<T> currentItem;

        public TreeIterator() {
            currentNode = null;
            currentItem = null;
        }

        public boolean hasNext() {
            if (isEmpty()) {
                return false;
            }
            if (findMax().getItem(findMax().getNumItems()-1).equals(currentItem)  ){
                return false;
            }
            return true;
        }

        public T next() {
            if (currentItem == null) {
                currentNode = findMin();
                currentItem = findMin().getItem(0);
                return currentItem.dData;
            }
            int iItem = currentNode.findItem(currentItem.dData) + 1;
            if (iItem+1<=currentNode.getNumItems()) {

                while (!currentNode.isLeaf()) {
                    currentNode = currentNode.getChild(iItem);
                    iItem = 0;
                }
                currentItem = currentNode.getItem(iItem);
                return currentItem.dData;
            }
            else {
                if (!currentNode.isLeaf()) {
                    currentNode = currentNode.getChild(iItem);
                    while(!currentNode.isLeaf()) {
                        currentNode = currentNode.getChild(0);
                    }
                    currentItem = currentNode.getItem(0);
                }
                else {
                    Node<T> parent = currentNode.getParent();
                    while (haveElement(currentItem, parent)==false) {
                        parent = parent.getParent();
                    }
                    for (int i = 0; i<parent.getNumItems(); i++) {
                        if (currentItem.dData.compareTo(parent.getItem(i).dData)<0) {
                            currentItem = parent.getItem(i);
                            currentNode = parent;
                            break;
                        }
                    }
                }
                return currentItem.dData;
            }
        }

        public void remove() {
            throw new UnsupportedOperationException("remove");
        }

    }

    private boolean haveElement(DataItem<T> item, Node<T> parent) {
        for (int i = 0; i<parent.getNumItems(); i++) {
            if (item.dData.compareTo(parent.getItem(i).dData)<0) {
                item = parent.getItem(i);
                return true;
            }
        }
        return false;
    }

    public Iterator<T> iterator() {
        return new TreeIterator();
    }

    public Object[] toArray() {
        return new Object[0];
    }


    public <T1> T1[] toArray(T1[] a) {
        return null;
    }


    public boolean add(T t) {
        insert(t);
        return true;
    }

    public boolean remove(Object o) {
        return false;
    }


    public boolean containsAll(Collection<?> c) {
        Iterator iterator = c.iterator();
        while (iterator.hasNext()) {
            Object o = iterator.next();
            if (!this.contains(o)) return false;
        }
        return true;
    }

    public boolean addAll(Collection<? extends T> c) {
        Iterator iterator = c.iterator();
        while (iterator.hasNext()) {
            Object o = iterator.next();
            try {
                this.add((T)o);
            } catch (ClassCastException ignored) {
            }
        }
        return true;
    }


    public boolean removeAll(Collection<?> c) {
        return false;
    }


    public boolean retainAll(Collection<?> c) {
        return false;
    }

    public void clear() {

    }
}
