package Question3.TwoThreeFourTree;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/16/19 12:04 AM
 */
class Node {
    private static final int ORDER = 4;
    private int numItems;//节点中实际存储的数据项数目，其值一定不大于3
    private Node parent;
    private Node childArray[] = new Node[ORDER];//子节点数组
    private Tree234.DataItem itemArray[] = new Tree234.DataItem[ORDER - 1];//存储数据项数组

    //-------------------------------------------------------------
// 把参数中的节点作为子节点，与当前节点进行连接
    public void connectChild(int childNum, Node child) {
        childArray[childNum] = child;
        if (child != null)
            child.parent = this;//当前节点作为父节点
    }

    //-------------------------------------------------------------
// 断开参数确定的节点与当前节点的连接，这个节点一定是当前节点的子节点。
    public Node disconnectChild(int childNum) {
        Node tempNode = childArray[childNum];
        childArray[childNum] = null; //断开连接
        return tempNode;//返回要这个子节点
    }

    //-------------------------------------------------------------
    public Node getChild(int childNum)//获取相应的子节点
    {
        return childArray[childNum];
    }

    //-------------------------------------------------------------
    public Node getParent()//获取父节点
    {
        return parent;
    }

    //-------------------------------------------------------------
    public boolean isLeaf()//是否是叶结点
    {
        return (childArray[0] == null) ? true : false;
    }//叶结点没有子节点

    //-------------------------------------------------------------
    public int getNumItems()//获取实际存储的数据项数目
    {
        return numItems;
    }

    //-------------------------------------------------------------
    public Tree234.DataItem getItem(int index)   // 获取具体的数据项
    {
        return itemArray[index];
    }

    //-------------------------------------------------------------
    public boolean isFull()//该节点是否已满
    {
        return (numItems == ORDER - 1) ? true : false;
    }

    //-------------------------------------------------------------
    public int findItem(long key)       // 查找
    {
        for (int j = 0; j < ORDER - 1; j++)         // 遍历数组
        {
            if (itemArray[j] == null)          // 数组未满，未找到
                break;
            else if (itemArray[j].dData == key)
                return j;
        }
        return -1;
    }  // end findItem

    //-------------------------------------------------------------
    public int insertItem(Tree234.DataItem newItem)//节点未满的插入
    {
        numItems++;
        long newKey = newItem.dData;         // 获得关键字

        for (int j = ORDER - 2; j >= 0; j--)        // 因为节点未满，所以从倒数第二项向前查找
        {
            if (itemArray[j] == null)          // 没存数据
                continue;
            else {
                long itsKey = itemArray[j].dData;//获得关键字
                if (newKey < itsKey)            //插入位置在其前面，但未必相邻
                    itemArray[j + 1] = itemArray[j]; //当前数据项后移
                else {
                    itemArray[j + 1] = newItem;   // 在其后位置插入
                    return j + 1;                 // 返回插入的位置下标
                }                           //    new item
            }  // end else (not null)
        }  // end for                     // shifted all items,
        //若上述代码没有执行返回操作，那么这是空节点（只有初始时根是这个情况）
        itemArray[0] = newItem;              // insert new item
        return 0;
    }  // end insertItem()

    //-------------------------------------------------------------
    public Tree234.DataItem removeItem()        // 移除数据项，从后向前移除
    {
        // 假设节点非空
        Tree234.DataItem temp = itemArray[numItems - 1];  // 要移除的数据项
        itemArray[numItems - 1] = null;           // 移除
        numItems--;                             // 数据项数目减一
        return temp;                            // 返回要移除的数据项
    }

    //-------------------------------------------------------------
    public void displayNode()           // format "/24/56/74/"
    {
        for (int j = 0; j < numItems; j++)
            itemArray[j].displayItem();   // "/56"
        System.out.println("/");         // final "/"
    }
}
