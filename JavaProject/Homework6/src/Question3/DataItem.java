package Question3;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/22/19 10:30 PM
 */
public class DataItem<T extends Comparable<T> > {
    public T dData;

    public DataItem(T dd) {
        dData = dd;
    }
    public void displayItem() {
        System.out.print("/" + dData);
    }

    @Override
    public String toString() {
        return "/" + dData;
    }

    @Override
    public boolean equals(Object obj) {
        if(obj == null) return false;
        if(obj instanceof DataItem) {
            return dData.equals(((DataItem) obj).dData);
        }
        return false;
    }
}
