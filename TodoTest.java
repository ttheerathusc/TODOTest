
import java.util.ArrayList;

public class TodoTest {

    private ArrayList<String> TODOList;

    public TodoTest() {
        TODOList = new ArrayList<String>();
    }

    public static void main(String[] args) {
        TodoTest myList = new TodoTest();
        
        System.out.println("ORDER");
        
        myList.add("Fish");
        myList.add("Onion");
        myList.add("Eggs");
        myList.add("Salt");
        myList.add("Soy Sauce");
        myList.add("Fish Sauce");

        myList.done("Fish");
        myList.done("Onion");

        myList.checkOrder();
        
        myList.done("Eggs");
        myList.done("Soy Sauce");
        
        myList.checkOrder();
        
        myList.done("Salt");
        myList.done("Fish Sauce");
        
        myList.checkOrder();
    }

    public void add(String order) {
        TODOList.add(order);
    }

    public void done(String order) {
        TODOList.remove(order);
    }

    public void checkOrder()
    {
        if (!TODOList.isEmpty())
        {
            System.out.println("---- You have " + String.valueOf(TODOList.size()) + " orders ----");
            System.out.println("[LIST]");
            todoString();
        }
        else
        {
            System.out.println("-----------------------------------------");
            System.out.println("You're DONE");
            System.out.println("-----------------------------------------");
        }
    }
    
    public void todoString() {
        for (String myListString : TODOList){
            System.out.println(" - " + myListString);
        }
    }
}
