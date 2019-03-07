package hongxi_li;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Date;
import java.util.HashSet;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/7/19 2:46 PM
 */
public class User implements Comparable<User> {
    private String name;
    private int id;
    private Date birth;

    public User (String name, int id, Date birth)
    { this.name = name; this.id = id; this.birth = birth; }


    public int getId() { return id; }
    public String getName()   {  return name; }
    public Date getBirth()      {  return birth;  }

    @Override  //override equals function
    public boolean equals(Object other) {
        //whether they are the same object
        if (this == other) return true;
        //Judge the object is null or not, and whether they are the same class
        if (other == null || (this.getClass() != other.getClass()))
        { return false; }

        User guest = (User) other;
        return(this.id == guest.id) &&
                (this.name != null && name.equals(guest.name)) &&
                (this.birth != null && birth.equals(guest.birth));
    }

    @Override     //override Hashcode function
    public int hashCode() {
        //get the hashcode of the id, name, birth and multiple 31
        int result = 0;
        result = 31*result + id;
        result = 31*result + (name !=null ? name.hashCode() : 0);
        result = 31*result + (birth !=null ? birth.hashCode() : 0);
        return result;
    }

    @Override // Used to sort user by id
    public int compareTo(User o) {
        return this.id - o.id;
    }


    public static void main(String[] args) {

        HashSet<User> set = new HashSet<>();
        User user1 = new User("zhangsan",123, new Date(99,2,23));
        User user2 = new User("zhangsan",123, new Date(99,2,23));
        User user3 = new User("lisi",111, new Date(98,3,26));
        set.add(user1);
        set.add(user2);
        set.add(user3);
        System.out.println("Total size is " + set.size());
        System.out.println("User1 Hash code of string is = " + user1.hashCode());
        System.out.println("User2 Hash code of string is = " + user2.hashCode());
        System.out.println("User3 Hash code of string is = " + user3.hashCode());

        ArrayList<User> list = new ArrayList<User>();
        list.add(user1);
        list.add(user2);
        list.add(user3);

        Collections.sort(list);

        System.out.println("User after sorting by id : ");
        for (User user: list)
        {
            System.out.println(user.getName() + " " +
                    user.getId() + " " +
                    user.getBirth());
        }
    }



}


