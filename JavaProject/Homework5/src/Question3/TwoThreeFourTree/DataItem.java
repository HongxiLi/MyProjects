package Question3.TwoThreeFourTree;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/16/19 12:06 AM
 */
public class DataItem {
    public long dData;          // 存储的数据类型，可以为其他复杂的对象或自定义对象
    //--------------------------------------------------------------
    public DataItem(long dd)    // 构造函数
    { dData = dd; }
    //--------------------------------------------------------------
    public void displayItem()   // 显示数据
    { System.out.print("/"+dData); }
//--------------------------------------------------------------
}  // end class DataItem

